import React, { useEffect, useRef, useState } from 'react'
import { useLocation, useNavigate, useParams } from 'react-router'
import Avatar from 'react-avatar';
import { initSocket } from '../../Helpers/socket';
import { ACTIONS } from '../../Helpers/Actions';
import {toast,Toaster} from 'react-hot-toast'
// import "react-toastify/dist/ReactToastify.css";
import axios from 'axios';
import { BAPI } from '../../variables';
import { isAuthenticated } from '../../Helpers';


export default function ChatRoom() {
    const roomId=useParams()['roomId']
    const param= window.location.href;
    
   
    const [code,setCode]=useState("")
    const [messages,setMessages]=useState([{}])
    const [users, setUsers] = useState([]);
    const socketRef=useRef(null)
    const editorRef=useRef(null)
    const navigate=useNavigate()


    useEffect(()=>{
       
        const init=async()=>{
            socketRef.current=await initSocket();
       
            socketRef.current.on('connect_error',(err)=>handleErrors(err))
            socketRef.current.on('connect_failed',(err)=>handleErrors(err))

            function handleErrors(e){
                console.log('socket error ',e)
                toast.error('Socket Connection Failed,try again later.')
              navigate('/dashboard')


            }
            socketRef.current.emit(ACTIONS.JOIN,{
                roomId,
                name:isAuthenticated().data.user.name
            })

            //Listening for joined event
            socketRef.current.on(ACTIONS.JOINED,({clients,name,socketId})=>{
                if(name!=isAuthenticated().data.user.name){
                    
                    toast.success(`${name} joined the room`)
                    console.log(`${name} joined the room`)
                }
               
               setUsers(clients)


               socketRef.current.emit(ACTIONS.SYNC_MESSAGE,{
                socketId,
                message: {name:isAuthenticated().data.user.name,message:"I have joined the room"}
               })


            })

            //Listeniing for disconnected
            socketRef.current.on(ACTIONS.DISCONNECTED,({socketId,name})=>{
                    toast.success(`${name} left the room`)
                    setUsers((prev)=>{
                        return prev.filter((client)=>
                            (client.socketId!=socketId)
                        )
                    })
            })


            socketRef.current.on(ACTIONS.MESSAGE_SENT,({message})=>{
             
                setMessages(prevMessages => [...prevMessages, message]);

              
            })


        }
        init()

        return ()=>{
            if (socketRef.current) {
               // socketRef.current.disconnect();
          
                // Remove event listeners
                socketRef.current.off(ACTIONS.JOINED);
                socketRef.current.off(ACTIONS.DISCONNECTED);
              }
        }
    },[])

    const sendMessage=()=>{
     
        socketRef.current.emit(ACTIONS.MESSAGE_SENT,{
            roomId,
            message: {name:isAuthenticated().data.user.name,message:code}
        })

        setCode("")

       

    }


    const copyToClipboard = async () => {
        try {
          // Copy the 'param' state to the clipboard
          await navigator.clipboard.writeText(param);
          console.log('Text copied to clipboard');
        } catch (err) {
          console.error('Unable to copy text to clipboard', err);
        }
      };
    




     

    

    
  return (
    <div className="container-fluid vh-100 overflow-auto"
    style={{
      backgroundColor: "#1c2333",
      marginTop: "55px",
      background: "linear-gradient(to right, #8e44ad, #3498db, #00cec9)",
    }}>
        <div className="row p-2">
        
            <div className="col-lg-2 col-sm-12 bg-dark border border-5 border-success mt-5 rounded-2 p-2" >
                <div className="row">
                   <center><h3 className='text-white p-3'>Connected Users</h3></center>
                <hr className='text-white'/>

                {
                    users.map((data,index)=>{
                        return  <Avatar className='m-1' data-toggle="tooltip" data-placement="top" title={data.name} name={data.name} size="50" round={true}/>
                    })
                }
                 </div>
                 <hr className='text-white '/>
                 <div className='row container-fluid'>
                    <center>
                 <button className="btn btn-info " onClick={copyToClipboard}>Share Link</button>
                 </center>
                 </div>
                

            </div>
           
            <div className="col-lg-10 col-sm-12"  >
            <div className='mt-5 bg-white mx-auto p-2 rounded-2 border border-3 border-black vh-100 mb-2' style={{ maxHeight: "20rem", overflowY: "auto" }}>
    {messages && 
        messages.map((data,index)=>{
            return <div key={index}><b>{data?.name}:</b>{data?.message}
            <hr></hr></div>
        })
    }
</div>

<span className='d-flex align-items-center '>
<textarea rows={2} value={code} onChange={e=>{setCode(e.target.value)}} className='w-75 rounded-2'></textarea><button className="ms-2 btn btn-primary w-25" onClick={e=>sendMessage()}>Send Message</button>
</span>

</div>

        
        </div>
       
       
           </div>
  )
}
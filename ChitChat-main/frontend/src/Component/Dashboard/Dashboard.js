import React, { useState } from 'react'
import { useNavigate } from 'react-router';
import { v4 as uuidv4 } from 'uuid';
import { isAuthenticated } from '../../Helpers';
import { BAPI } from '../../variables';



export default function Dashboard() {
    const [roomId,setRoomId]=useState()
    const navigate=useNavigate()
    const [err,setErr]=useState("")

    const generateId=()=>{
        const id = uuidv4();
        setRoomId(id)
    }

    const navigateToEditor=()=>{
        if(!roomId){
            setErr("Set Room Id")
        }else{
            
            navigate(`/room/${roomId}`)
        }
        

    }
    
  return (
    <div className="container-fluid vh-100 overflow-auto"
    style={{
      backgroundColor: "#1c2333",
      marginTop: "55px",
      background: "linear-gradient(to right, #8e44ad, #3498db, #00cec9)",
    }}>

<center><h1 className="text-white" style={{fontFamily:"cursive",marginTop:"6%",marginBottom:"0%"}}><b><u>Create Room</u></b></h1></center>
<center className='p-5'>
{err && (
          <div class="alert alert-danger mt-2" role="alert">
            {err}
          </div>
        )}
<div className="container-fluid border border-5 border-white p-5 rounded-5 mt-3">
            <div>
            
              <div class="form-group text-white mb-2">
                <label for="exampleInputEmail1"><h6>Enter Room Id : </h6></label>
                <input
                  type="text"
                  class="form-control "
                  id="exampleInputEmail1"
                  aria-describedby="emailHelp"
                  placeholder="Enter email"
                  value={roomId}
                  onChange={e=>{setRoomId(e.target.value)}}


                  
                />
               
              </div>
              
              <div className='row p-2'>
                <div className="col mb-2 mt-2">
                <button onClick={generateId} class="btn btn-info   w-100">
                Generate Room ID
              </button>
                </div>

                <div className="col mb-2 mt-2">
                <button onClick={navigateToEditor} class="btn btn-info   w-100">
                Join Room
              </button>
                </div>
              </div>
             
             
              
            </div>
          </div></center>      


    
    </div>
  )
}
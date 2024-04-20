import React from 'react'
import chat from '../../Images/chat.jpg'
import { useNavigate } from 'react-router-dom/dist/umd/react-router-dom.development'

export default function Home() {
    const navigate=useNavigate()
  return (
    <div className=' container-fluid  text-white vh-100 d-flex align-items-center ' style={{backgroundColor:"#1c2333",marginTop:"55px",  background: 'linear-gradient(to right, #8e44ad, #3498db, #00cec9)'
  ,fontFamily:"initial"}}>
  <div className="row">
    <div className="col-lg-5">
  <img src={chat} className='img-fluid rounded-5' alt='chat'  />
  </div>
  <div className="col mt-5"><h1>Hello Users,</h1>
  <hr></hr>
  <h2>
    <ul>
        <li>Welcome to our chat app,where you can chat with your buddies anytime, anywhere and anything.</li>
        <li>No chat storage just real-time communication.</li>
        <li>Create your room, call your friends and chat.</li>
        <center><button className="btn btn-success mt-5 w-50" onClick={e=>{navigate('/signup')}}>Join Now</button>
        </center></ul> </h2>
  </div>
  </div>
  </div>
  )
}

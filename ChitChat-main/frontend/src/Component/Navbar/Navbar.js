import React from 'react'

import { isAuthenticated } from "../../Helpers/index.js";
import {signout} from "../../Helpers/signout"
import { useNavigate,Link } from "react-router-dom";
import Avatar from 'react-avatar';


export default function Navbar() {

    const navigate=useNavigate()
  return (
 
        <nav class="navbar navbar-light bg-light fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#" style={{fontFamily:"cursive",color:"#3498db",textShadow: '3px 3px 6px rgba(0, 0, 0, 0.5)',letterSpacing:"2px",fontSize:"25px"}}><b><i>Chat App</i></b> 
                
                {/* <img  className='img-fluid'src={logo} alt='logo' style={{width:"20%",borderRadius:"50px",mixBlendMode:"darken"}}/> */}
 </a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar"
                    aria-controls="offcanvasNavbar"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div
                    class="offcanvas offcanvas-end"
                    tabindex="-1"
                    id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel"
                >
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                            Chat App

                        </h5>
                        
                        <button
                            type="button"
                            class="btn-close text-reset"
                            data-bs-dismiss="offcanvas"
                            aria-label="Close"
                        ></button>
                        
                    </div>
                    <div class="offcanvas-body">
                    {isAuthenticated() &&<h5 class="offcanvas-title border border-primary p-2" id="offcanvasNavbarLabel">
                    <Avatar className='' name={isAuthenticated().data.user.name} size="40" round={true}/> Welcome,  <b>{isAuthenticated().data.user.name}</b>
                        </h5>}
                        <br></br>
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <Link
                                    class="nav-link active"
                                    aria-current="page"
                                    to="/"
                                    ><b>Home</b></Link
                                >
                            </li>
                            <hr/>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="#"><b>About Us</b></a>
                            </li>
                           <hr/>

                           
                           {isAuthenticated() && <li class="nav-item">
                                <Link class="nav-link" to="/dashboard"><b>Dashboard</b></Link>
                                <hr/> </li>}

                          

                            {!isAuthenticated() && <li class="nav-item">
                                <Link class="nav-link" to="/login"><b>Login / Signup</b></Link>
                            </li>}

                            {
                                isAuthenticated() && 
                                <li class="nav-item">
                                <a class="nav-link " href="#"><b onClick={e=>{signout();navigate('/')}}>Logout</b></a>
                            </li>
                            }


                            

                            {/* <li class="nav-item dropdown">
                                <a
                                    class="nav-link dropdown-toggle"
                                    href="#"
                                    id="dropdownId"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                    >Dropdown</a
                                >
                                <div
                                    class="dropdown-menu"
                                    aria-labelledby="dropdownId"
                                >
                                    <a class="dropdown-item" href="#"
                                        >Action 1</a
                                    >
                                    <a class="dropdown-item" href="#"
                                        >Action 2</a
                                    >
                                </div>
                            </li> */}
                        </ul>
                        {/* <form class="d-flex">
                            <input
                                class="form-control me-2"
                                type="search"
                                placeholder="Search"
                                aria-label="Search"
                            />
                            <button class="btn btn-outline-success" type="submit">
                                Search
                            </button>
                        </form> */}
                    </div>
                </div>
            </div>
        </nav>

        
        

  )
}
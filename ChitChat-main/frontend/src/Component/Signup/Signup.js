import React, { useState } from "react";
import login from "../../Images/login1.avif";
import { BAPI } from "../../variables";
import axios from "axios";
import { useNavigate } from "react-router";
import { Link } from "react-router-dom";

export default function Signup() {

    const [name,setName]=useState("")
    const [email,setEmail]=useState("")
    const [password,setPassword]=useState("")
    const [success, setSuccess] = useState("");
    const [err, setErr] = useState("");
    const navigate=useNavigate()

    const SignUpHelper = async () => {
        
        try {
          await axios
            .post(`${BAPI}/signup`, {
              name: name,
              email:email,
              password:password
            })
            .then((response) => {
              console.log(response.data);
              setSuccess("Signed up Successfully");
              
            })
            .catch((err) => {
              setErr(err.message);
              setSuccess("");
              // return err;
            });
        } catch (err) {
          setErr(err.message);
          setSuccess("");
        }
      };

  return (
    <div
      className="container-fluid vh-100 overflow-auto"
      style={{
        backgroundColor: "#1c2333",
        marginTop: "55px",
        background: "linear-gradient(to right, #8e44ad, #3498db, #00cec9)",
      }}
    >
        
      <div className="row p-5 mb-5">
      <center><h1 className="text-white" style={{fontFamily:"cursive",marginTop:"4%",marginBottom:"0%"}}><b><u>Signup User</u></b></h1></center>
      <center>
      {err && (
          <div class="alert alert-danger mt-2" role="alert">
            {err}
          </div>
        )}
        {success && (
          <div class="alert alert-success mt-2" role="alert">
            {success}
          </div>
        )}
      </center>
        <div className="col-lg-4 col-sm-12 " style={{ marginTop: "6%" }}>
         <center> <img className="img-fluid rounded-5" src={login} /></center>
        </div>
        <div className="col-lg-8 col-sm-12  " style={{ marginTop: "5%" }}>
          <div className="container-fluid border border-5 border-white p-5 rounded-5">
            <div>

            <div class="form-group text-white mb-2">
                <label for="name"><h6>Name</h6></label>
                <input
                  type="text"
                  class="form-control"
                  id="name"
                  aria-describedby="emailHelp"
                  placeholder="Enter Name.."
                  value={name}
                  onChange={e=>setName(e.target.value)}
                />
               
              </div>
            
              <div class="form-group text-white mb-2 mt-2">
                <label for="exampleInputEmail1"><h6>Email address</h6></label>
                <input
                  type="email"
                  class="form-control"
                  id="exampleInputEmail1"
                  aria-describedby="emailHelp"
                  placeholder="Enter email ..."
                  value={email}
                  onChange={e=>setEmail(e.target.value)}
                />
               
              </div>
              <div class="form-group text-white mb-2 mt-2">
                <label for="exampleInputPassword1"><h6>Password</h6></label>
                <input
                  type="password"
                  class="form-control"
                  id="exampleInputPassword1"
                  placeholder="Password"
                  value={password}
                  onChange={e=>setPassword(e.target.value)}
                />
              </div>
              
              <button onClick={SignUpHelper} class="btn btn-info w-100 mt-3">
                SignUp
              </button>
              <div className="mt-2 mb-2">
              <span className=" text-white"><h6>Already have an account?  <Link to="/login">Signin</Link></h6>
             </span>
              </div>
            
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}
import axios from 'axios'

export const authenticate = (data, next) => {
    if (typeof window !== "undefined") {
      //window obj is accessible
      localStorage.setItem("jwt", JSON.stringify(data));
      //jwt is a token
      next();
    }
  };
  export const isAuthenticated = () => {
    if (typeof window == "undefined") {
      //window obj is undeifined ie.no access therifore user not authenticated
      return false;
    }
    if (localStorage.getItem("jwt")) {
      return JSON.parse(localStorage.getItem("jwt"));
    } else {
      return false;
    }
  };

  
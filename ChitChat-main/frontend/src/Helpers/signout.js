import axios from "axios";
import { BAPI } from "../variables";

export const signout = async () => {
  if (typeof window !== "undefined") {
    //window obj is accessible
    localStorage.removeItem("jwt"); //removing after signout
    //jwt is a token

    //logout user from bkend
    await axios
      .get(`${BAPI}/signout`)
      .then((response) =>{ return response.json()})
      .catch((err) => console.log(err));
  }
};
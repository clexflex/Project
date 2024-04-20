const User = require("../models/user");

const { validationResult } = require("express-validator");

const jwt = require("jsonwebtoken");

const { expressjwt: expressJWT } = require("express-jwt");

//signup controller
exports.signup = (req, res) => {
  const errors = validationResult(req);
  if (!errors.isEmpty()) {
    return res.status(422).json({
      error: errors.array()[0].msg,
    });
  }
  const user = new User(req.body);
  user
    .save()
    .then((user) => {
      
      res.json({
        email: user.email,
        id: user._id,
      });
    })
    .catch((err) => {
      console.log(err)
      if (err) {
        return res.status(400).json({
          err: "Not able to save user in DB",
        });
      }
    });
};

//signout controller
exports.signout = (req, res) => {
  res.clearCookie("token");
  res.json({
    message: "User Sign out successful",
  });
};

//signin controller
exports.signin = (req, res) => {
  const { email, password } = req.body;
  const errors = validationResult(req);
  if (!errors.isEmpty()) {
    return res.status(422).json({
      error: errors.array()[0].msg,
    });
  }
  User.findOne({ email })
    .then((user) => {
      if (!user) {
        return res.status(400).json({
          error: "User Email does not exist",
        });
      }
      if (!user.authenticate(password)) {
        return res.status(401).json({
          error: "Password and Email does not match",
        });
      }

      //create token
      const token = jwt.sign({ _id: user._id }, "shhhhh");

      //put token in user cookie
      res.cookie("token", token, { expire: new Date() + 9999 });

      //send response to frontend
      const { _id, name, email } = user;
      res.json({ token, user: { _id,email, name} });
    })
    .catch((err) => {
      if (err) {
        return res.status(400).json({
          error: "User Email does not exist",
        });
      }
    });
};

//middlewares ---protected routes
exports.isSignedIn = expressJWT({
  secret: "shhhhh",
  userProperty: "auth",
  algorithms: ["HS256"],
});

exports.isAuthenticated = (req, res, next) => {
  let checker = req.profile && req.auth && req.profile._id == req.auth._id;
  if (!checker) {
    return res.status(403).json({
      error: "Access Denied",
    });
  }
  next();
};
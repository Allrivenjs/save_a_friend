import React from 'react';
import { useState } from 'react';

const Login = () => {

    const [user, setUser] = useState({
        user: '',
        password: '',
    });

    const handleChange = (e) => {
        setUser({
            ...user, [e.target.name]: e.target.value
        });
        console.log(user);
    };

    const handleSubmit = (e) =>{
        e.preventDefault();
        console.log(e);
    }

    return(
        <div className="login__container">
            <div className="login">
                <h2 className="login__title" >Welcome!</h2>
                <form className="login__form" onSubmit={handleSubmit} method="post" >
                    <label htmlFor="user"></label>
                    <input
                        className="login__input"
                        type="user"
                        name="user" 
                        placeholder="User"
                        onChange={handleChange}
                    ></input>

                    <label htmlFor="password"></label>
                    <input
                        className="login__input"
                        type="password"
                        name="password" 
                        placeholder="Password"
                        onChange={handleChange}
                    ></input>
                    <button
                        type="submit" 
                        className="btn"
                    >Login</button>
                </form>
            </div>
        </div>
    );
};

export default Login;
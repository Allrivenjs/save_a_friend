import React, { useState } from 'react';
import { Redirect } from 'react-router-dom';

import Axios from 'axios';

import Cookies from 'universal-cookie';

const cookies = new Cookies();

const Login = (props) => {

    const [user, setUser] = useState({
        email: '',
        password: '',
    });

    // Función para logearse
    const login = async (user) => {
        try {
            const userData = await Axios.post('/api/v1/login', {
                email: user.email,
                password: user.password,
            });
            // Si la respuesta viene sin token, entonces algo salio mal con los datos
            if(!userData.data.access_token) {
                alert("Invalid credentials");
            } else {
                // Si el token existe, guardamos en las cookies el valor del token
                cookies.set( 'userToken', userData.data.access_token, { path: '/' } );
                props.history.push('/profile');
                window.location.reload(false);
            }
            console.log(userData);
        } catch(error) {    // Capturar errores de login
            console.error("Login error:", error);
        }
    };

    const handleChange = (e) => {
        setUser({
            ...user, [e.target.name]: e.target.value
        });
        console.log(user);
    };

    const handleSubmit = (e) =>{
        e.preventDefault();
        login(user);
    }

    // Si existe un sesión de usuario en las cookies, entonces login redireccionara a dash
    if(!cookies.get('userToken'))
    {
        return(
            <div className="login__container">
                <div className="login">
                    <h2 className="login__title" >Welcome!👋</h2>
                    <form className="login__form" onSubmit={handleSubmit} method="post" >
                        <label htmlFor="email"></label>
                        <input
                            className="login__input"
                            type="email"
                            name="email" 
                            placeholder="Email"
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
    } else 
    {
        return <Redirect to="/profile" />;
    }
};

export default Login;
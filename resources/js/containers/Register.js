import React, { useState } from 'react';

import Loading from '../components/Loading';

import Axios from 'axios';

const Register = () => {

    const [loading, setLoading] = useState(false);

    // Estado de usuario
    const [user, setUser] = useState({
        name: '',
        lastname: '',
        phone: '',
        email: '',
        password: '',
        password_confirmation: '',
    });

    const handleChange = (e) => {
        setUser({
            ...user, [e.target.name]: e.target.value
        });
    };

    const handleSubmit = (e) =>{
        e.preventDefault();
        register(user);
    }

    const register = () => {
        try {

        } catch (e) {
            console.error("Error in register form: ", e);
        }
    };

    return(
        <>
            <div className="login__container">
                <div className="login">
                    <h2 className="login__title" >A new friend!😸</h2>
                    <form className="login__form" onSubmit={handleSubmit} method="post" autoComplete="off" >
                        <label htmlFor="name"></label>
                        <input
                            className="login__input"
                            type="name"
                            name="name"
                            placeholder="Name"
                            onChange={handleChange}
                            autoComplete="off"
                        ></input>

                        <label htmlFor="lastname"></label>
                        <input
                            className="login__input"
                            type="lastname"
                            name="lastname"
                            placeholder="Last name"
                            onChange={handleChange}
                            autoComplete="off"
                        ></input>

                        <label htmlFor="phone"></label>
                        <input
                            className="login__input"
                            type="phone"
                            name="phone"
                            placeholder="Phone"
                            onChange={handleChange}
                            autoComplete="off"
                        ></input>

                        <label htmlFor="email"></label>
                        <input
                            className="login__input"
                            type="email"
                            name="email"
                            placeholder="Email"
                            onChange={handleChange}
                            autoComplete="off"
                        ></input>

                        <label htmlFor="email_confirmation"></label>
                        <input
                            className="login__input"
                            type="email_confirmation"
                            name="email_confirmation"
                            placeholder="Confirm your email"
                            onChange={handleChange}
                            autoComplete="off"
                        ></input>

                        <label htmlFor="password"></label>
                        <input
                            className="login__input"
                            type="password"
                            name="password"
                            placeholder="Password"
                            onChange={handleChange}
                            autoComplete="off"
                        ></input>

                        { loading
                            ?
                            <Loading></Loading>
                            :
                            <button
                                type="submit"
                                className="btn w-full"
                            >Register
                            </button>
                        }
                    </form>
                </div>
            </div>
        </>
    );
};

export default Register;
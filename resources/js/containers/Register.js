import React, { useState } from 'react';

import Loading from '../components/Loading';

import Axios from 'axios';

import Cookies from 'universal-cookie';


const cookies = new Cookies();

const Register = (props) => {

    const [loading, setLoading] = useState(false);

    // Estado de usuario al registrarse
    const [user, setUser] = useState({
        name: '',
        lastname: '',
        phone: '',
        email: '',
        email_confirmation: '',
        password: '',
        birthday: '',
    });

    // Funcion para cambiar los inputs values 
    const handleChange = (e) => {
        setUser({
            ...user, [e.target.name]: e.target.value
        });
    };

    // Funcion para el form
    const handleSubmit = (e) =>{
        e.preventDefault();
        console.log(user);
        register(user);
    }

    // Función para registrarse
    const register = async () => {
        try {
            // post request
            const userData = await Axios.post('/api/v1/register', {
                name: user.name,
                lastname: user.lastname,
                phone: user.phone,
                email: user.email,
                email_confirmation: user.email,
                password: user.password,
                birthday: user.birthday,
            });

            cookies.set( 'userToken', userData.data.Register.token, { path: '/' } );
            props.history.push('/profile');
            window.location.reload(false);
        } catch (e) {
            console.error("Error in register form: ", e);
            console.log(e.response.data);
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

                        <label htmlFor="birthday"></label>
                        <input
                            className="login__input"
                            type="date"
                            name="birthday"
                            placeholder="Birthday"
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
                            name="email"
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
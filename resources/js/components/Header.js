import React from 'react';

import { Link } from 'react-router-dom';

import { FiUser } from 'react-icons/fi';

import Cookies from 'universal-cookie';

const cookies = new Cookies();

const Header = (props) => {

    const userToken = cookies.get('userToken');

    return (
        <div className="header">
            <Link to="/">
                <div className="header__logo">
                    🐶 Save a friend
                </div>
            </Link>
            
            <div className="header__btns">
                {userToken 
                ?
                <div>
                    <Link to="/profile">
                        <button className="btn-header flex justify-center items-center">
                            <FiUser />
                            <span className="ml-2"> Profile </span>
                        </button>
                    </Link>
                </div>
                : 
                <div>
                    <Link to="/login">
                        <button className="btn-header">
                            Login
                        </button>
                    </Link>

                    <Link to="/register">
                        <button className="btn-header">
                            Register
                        </button>
                    </Link>
                </div>
                }
            </div>
        </div>
    )
};

export default Header;
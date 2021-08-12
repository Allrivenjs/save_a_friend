import React from 'react';

import { Link } from 'react-router-dom';

const Header = () => {
    return (
        <div className="header">
            <Link to="/">
                <div className="header__logo">
                    🐶 Save a friend
                </div>
            </Link>
            
            <div className="header__btns">
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

        </div>
    )
};

export default Header;
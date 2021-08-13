import React from 'react';

import { FiUser } from 'react-icons/fi';
import { Redirect } from 'react-router-dom';

import Cookies from 'universal-cookie';

const cookies = new Cookies();

const Profile = () => {
    if(cookies.get('userToken')) {
        return(
            <div className="flex flex-col justify-center items-center">
                <div className="profile-container">
                    <div className="profile-header">
                        <div className="profile-header__banner">
                            
                        </div>
                        <div className="profile-header__avatar">
                            {/* <img src="" className="profile-header__photo"></img> */}
                            <div className="avatar-container">    
                                <FiUser className="text-6xl" />
                            </div>
                            <h1 className="title">Jaime Andres</h1>
                        </div>
                        <hr className="w-full mt-20 mb-4"/>
                    </div>
                </div>
    
                <div className="content">
                    <div className="card">
                        posts
                    </div>
                </div>
            </div>
        );
    } else {
        return <Redirect to="/login" />
    }
};

export default Profile;
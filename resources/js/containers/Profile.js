import React, { useState } from 'react';

import { FiUser } from 'react-icons/fi';
import { VscNewFile } from 'react-icons/vsc';
import { Redirect } from 'react-router-dom';

import Cookies from 'universal-cookie';
import HandleProfileSection from '../components/HandleProfileSection';

const cookies = new Cookies();

const Profile = ( props ) => {
    // Manejar la sección de los botones
    const [section, setSection] = useState('posts');

    const handlePostsBtn = (e) => {
        setSection('posts');
    };

    const handleAboutBtn = (e) => {
        setSection('about');
    };

    const handlePhotosBtn = (e) => {
        setSection('photos');
    };

    if(cookies.get('userToken')) {
        return(
            <div className="flex flex-col justify-center items-center">
                <div className="profile-container">
                    <div className="profile-header">
                        {props.coverPhoto
                            ?
                                <img className="profile-header__banner" src={props.coverPhoto} alt="cover photo"/>
                            :
                                <div className="profile-header__banner-default"> </div> 
                        }
                        <div className="profile-header__avatar">
                            <div className="avatar-container">

                                {props.profilePhoto 
                                    ? 
                                        <img className="avatar-photo" src={props.profilePhoto} alt="profile photo"/>
                                    :
                                        <FiUser className="text-6xl" />
                                }   

                            </div>
                            <h1 className="title">{props.name} {props.lastname}</h1>
                        </div>
                        <div className="profile-header__text">
                            <p className="mb-2 text-gray-600"> {props.description} </p>
                            <button className="mb-4 text-sm text-blue-400 underline" >Edit</button>
                        </div>
                        <hr className="w-full mb-2"/>

                        <ul className="profile-header__menu">
                            <li className={ section === "posts" ? "profile-header__menu-item-on" : "" }> 
                                <button 
                                    onClick={handlePostsBtn}
                                > Posts </button> 
                            </li>
                            <li className={ section === "about" ? "profile-header__menu-item-on" : ""}>
                                <button
                                    onClick={handleAboutBtn}
                                > About </button>
                            </li>
                            <li className={ section === "photos" ? "profile-header__menu-item-on" : ""}>
                                <button 
                                    onClick={handlePhotosBtn}
                                > Photos </button>
                            </li>

                            <div className="profile-header__menu-btns">
                                <button className="btn flex justify-center items-center">
                                    <VscNewFile />
                                    <span className="ml-1"> New post</span>
                                </button>
                            </div>
                        </ul>

                    </div>
                </div>
            
                <HandleProfileSection 
                    section={section}
                />

            </div>
        );
    } else {
        return <Redirect to="/login" />
    }
};

export default Profile;
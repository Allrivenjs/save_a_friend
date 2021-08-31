import React, { useEffect, useState } from 'react';
import Profile from './Profile';

import Axios from 'axios';
import Cookies from 'universal-cookie';

import Spinner from '../components/Loading';

const ProfileContainer = () => {
    const cookies = new Cookies();

    const [loading, setLoading] = useState(false);

    const [profileData, setProfileData] = useState({ name: null, lastname: null, profilePhoto: null, coverPhoto: null });

    const getProfileInfo = async () => {
        setLoading(true);
        try {    
            let data = await Axios.get('/api/v1/profile', {
                headers: {
                    "Content-type": "application/json",
                    'Authorization': `Bearer ${cookies.get('userToken')}`
                }
            });

            let profileData = data.data.Profile[0].data;
            let userData = profileData.user;

            setProfileData({
                name: userData.name,
                lastname: userData.lastname,
                profilePhoto: userData.profile_photo_path,
                coverPhoto: profileData.profile_cover_photo_path
            });

            setLoading(false);

        } catch (error) {
            console.error("Fetch error in getProfileInfo: " + error);
        }
    };

    useEffect(() => {
        getProfileInfo();
    }, []);

    if(loading) {
        
        return(
            <div className="flex justify-center items-center h-screen w-screen">
                <Spinner />
            </div>
        );
    } else {
        return(
            <Profile
                name = {profileData.name}
                lastname = {profileData.lastname}
                profilePhoto = {profileData.profilePhoto}
                coverPhoto = {profileData.coverPhoto}
            >
            </Profile>
        );
    }
};

export default ProfileContainer;
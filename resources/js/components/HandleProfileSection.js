import React from 'react';

import ProfilePosts from './ProfilePosts';

const HandleProfileSection = ({ section }) => {

    // Por cada botón en el menu del header agregar un item aquí
    // para que sea renderizado
    if(section === 'posts')
    {
        return(
            <ProfilePosts />
        );
    } 
    else if(section === 'about')
    {
        return (
            <div>
                about
            </div>
        );
    }
    else if(section === 'photos')
    {
        return (
            <div>
                photos
            </div>
        );
    }
    else{
        return (
            <div>
                This section doesn't exist
            </div>
        );
    }
};

export default HandleProfileSection;
import React from 'react';

const API = `https://devruiz.xyz/api/v1/data/categories`;

const fetchPosts = async () => {
    const response = await fetch(API);
    const data = await response.json();
    console.log(data);
};

const Dashboard = () => {
    fetchPosts();

    return(
        <div>
            
        </div>
    );
};

export default Dashboard;
import React from 'react';

import { FiUser } from 'react-icons/fi';
import { FcLike } from 'react-icons/fc';

const Post = (props) => {


    return(
        <div className="post">
            {/* post header */}
            <div className="status__header mb-2">
                {/* <img src="" alt=""></img> */}
                <FiUser className="avatar-status" />
                <p className="status__header-user">User</p>
            </div>


            {/* post content */}
            <div className="status__header-content mb-2">
                Some content
            </div>

            {/* post likes */}
            <div className="status__header-like">
                <p className="status__header-user mr-3">69</p>
                <button>
                    <FcLike />
                </button>
            </div>
        </div>
    );
};

export default Post;
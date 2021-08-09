import React from 'react';
import ReactDOM from 'react-dom';

function Example() {

/*
    let user = document.querySelector('#user_data').dataset.user;
    user = (user)
    console.log(user);
*/

let user =this.props.user;
console.log(user)
    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header">Example Component</div>

                        <div className="card-body">Estoy haciendo pruebas para las pruebas que quiero hacer mas luego, si ves que son solo pruebas que haran pruebas, ajjaja xdxdxd, pruebas</div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Example;



if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}

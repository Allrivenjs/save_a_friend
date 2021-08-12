import React from "react";
import ReactDom from 'react-dom';

function App(){
    return <h1 className="h1 font-bold">Laravel with React</h1>
}

ReactDom.render(<App />, document.getElementById('root'));

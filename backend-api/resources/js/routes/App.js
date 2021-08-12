import React from 'react';
import { BrowserRouter, Route, Switch } from 'react-router-dom';

import Layout from '../components/Layout';
import Dashboard from '../containers/Dashboard';

import Home from '../containers/Home';
import Login from '../containers/Login';

const App = () => {
    return(
        <BrowserRouter>
            <Layout>
                <Switch>
                    <Route exact path="/" component={Home} />
                    <Route exact path="/login" component={Login} />
                    <Route exact path="/dash" component={Dashboard} />
                </Switch>
            </Layout>
        </BrowserRouter>
    );
};

export default App;
import React from 'react';
import {LayoutContainer} from "./LayoutContainer";
import Transactions from "./Transactions";
import TransactionClient from "../api/transactionClient";

const App = () => {
    return (
        <LayoutContainer>
            <Transactions client={new TransactionClient}/>
        </LayoutContainer>
    );
};

export default App;

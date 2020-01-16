import React from "react";
import TransactionClient from "../api/transactionClient";
import {TransactionInterface} from "../types";
import {TransactionItem} from "./TransactionItem";
import '../styles/transactions.scss'
import {PlaceHolder} from "./PlaceHolder";
import {TransactionCharts} from "./TransactionCharts";

interface TransactionProps {
    client: TransactionClient
}

interface TransactionsState {
    loading: boolean,
    error: boolean,
    transactions: TransactionInterface[],
    lastId?: number
}

export default class Transactions extends React.Component<TransactionProps, TransactionsState> {
    private fetchTimer?: number;

    constructor(props: any) {
        super(props);

        this.state = {
            loading: true,
            error: false,
            transactions: []
        }
    }

    componentDidMount(): void {
        this.fetchTimer = window.setInterval(() => this.fetchItems(), 1000)
    }

    componentWillUnmount(): void {
        clearInterval(this.fetchTimer)
    }

    fetchItems() {
        this.props.client.find(this.state.lastId)
            .then(
                (result) => {
                    let transactions = result.data.data;
                    this.setState({
                        loading: true,
                        transactions: transactions,
                        lastId: transactions.length ? transactions[0].id : null
                    });
                },
                (error) => {
                    this.setState({
                        error: true
                    });
                }
            )
    }

    render() {
        let {transactions} = this.state;

        return (
            <>
                <TransactionCharts transactions={this.state.transactions}/>
                <div className={'transactions'}>
                    {!transactions.length && <PlaceHolder title={'Waiting for transactions...'}/>}

                    {transactions && Object.keys(transactions).map(key => {
                        // @ts-ignore
                        return <TransactionItem key={transactions[key].id} transaction={transactions[key]}/>
                    })}
                </div>
            </>

        );
    }
}
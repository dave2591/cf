import React from "react";
import {TransactionInterface} from "../types";
import '../styles/transaction-charts.scss';

export const TransactionCharts = (props: { transactions: TransactionInterface[] }) => {
    function average() {
        let amountSellValues: any = props.transactions.map(({amount_sell}) => amount_sell);
        let avg = amountSellValues.reduce((sum: any, el: any) => sum + el, 0) / amountSellValues.length;

        return isNaN(avg) ? '-' : Math.round(avg * 100) / 100;
    }

    return (
        <div className={'transaction-charts'}>
            <div className={'chart'}>
                <div className={'title'}>Total Transactions</div>
                {props.transactions.length}
            </div>
            <div className={'chart'}>
                <div className={'title'}>Average Sell Value</div>
                {average()}
            </div>
        </div>
    );
};
import React from "react";
import {TransactionInterface} from "../types";

interface TransactionItemProps {
    transaction: TransactionInterface
}

export const TransactionItem = (props: TransactionItemProps) => {
    let {transaction} = props;

    return (
        <div className={'transaction-item'}>
            <div className={'currencies'}>
                <span>{transaction.currency_to}</span> / <span>{transaction.currency_from}</span>
            </div>
            <div className={'amounts'}>
                Buy <span>{transaction.amount_buy}</span> / Sell <span>{transaction.amount_sell}</span>
                <div className={'rate'}>
                    Rate: {transaction.rate}
                </div>
            </div>
            <div className={'country'}>
                {transaction.originating_country}
            </div>
        </div>
    );
};
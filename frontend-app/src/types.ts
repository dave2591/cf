export interface TransactionInterface {
    id: number,
    user_id: number,
    currency_from: string,
    currency_to: string,
    amount_sell: number,
    amount_buy: number,
    rate: number,
    originating_country: string
}
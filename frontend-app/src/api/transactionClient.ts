import {Client} from "./client";

export default class TransactionClient extends Client {
    findByDateRange(date_from: string) {
        return this.get(`/transactions/?date_from${date_from}`);
    }

    find(cursor?: number) {
        return this.get(`/transactions` + (cursor ? '?cursor=' + cursor : ''));
    }
}
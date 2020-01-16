import axios from "axios";

const API_ENDPOINT: string = 'http://127.0.0.1:2591/api';

class Client {
    protected post(url: string, body: object) {
        return axios.post(`${API_ENDPOINT}${url}`, body, Client.config);
    }

    protected put(url: string, body: object) {
        return axios.put(`${API_ENDPOINT}${url}`, body, Client.config);
    }

    protected get(url: string) {
        return axios.get(`${API_ENDPOINT}${url}`, Client.config);
    }

    private static get config() {
        return {
            headers: {
                'content-type': 'application/json',
                'accept': 'application/json'
            }
        }
    }
}

export {Client}
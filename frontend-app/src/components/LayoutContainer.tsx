import React from "react";
import {HeaderComponent} from "./HeaderComponent";

export const LayoutContainer = (props: any) => {
    return (
        <div className='container'>
            <HeaderComponent/>
            <section className={'main'}>
                {props.children}
            </section>
        </div>
    );
};
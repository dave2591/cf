import React from "react";
import '../styles/placeholder.scss';

export const PlaceHolder = (props: { title: string }) => {
    return (
        <div className={'placeholder'}>
            {props.title}
        </div>
    );
};
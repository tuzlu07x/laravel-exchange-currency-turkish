import React, { useEffect } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import { useState } from 'react';

function Example() {

    const [bots, setBot] = useState([]);

    window.onload = function () {
        setInterval(function () {
            axios.get('/borsa-bot/bot')
                .then(response => {
                    setBot(response.data);
                })
        }, 1000);
    }

    return (
        <div>
            <div className="container mt-5">
                <div className="row">

                    {bots.map(bot => (
                        <div className='col-md-3 mt-3'>
                            <div className='card text-primary'>
                                <div className='card-header'>
                                    <i className='fa-solid fa-arrow-down'></i>
                                    {bot.name}
                                </div>
                                <div className='card-body'>
                                    <strong>Buy : </strong>
                                    <strong>{bot.buy} ₺</strong>
                                </div>
                                <div className='card-body'>
                                    <strong>Sell : </strong>
                                    <strong>{bot.sell} ₺</strong>
                                </div>
                                <div className='card-body'>
                                    <strong>Status : </strong>
                                    <strong className='text-warning'>{bot.differance}</strong>
                                </div>
                            </div>
                        </div>
                    ))}
                </div>

            </div>

        </div >
    )
}

export default Example;

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}

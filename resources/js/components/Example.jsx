import React, { useEffect } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import { useState } from 'react';

function Example() {

    const [bots, setBot] = useState([]);

    useEffect(() => {
        axios.get('/borsa-bot/bot')
            .then(response => {
                setBot(response.data);
                console.log(response.data)
            })

    }, []);


    return (
        <div>
            <div className="container mt-5">
                <div className="row">

                    {bots.map(bot => (
                        <div className='col-md-3 mt-3'>
                            <div className='card'>
                                <div className='card-header'>
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

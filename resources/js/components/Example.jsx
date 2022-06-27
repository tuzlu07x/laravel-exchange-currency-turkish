import React from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import { useState } from 'react';
import { data } from 'autoprefixer';

function Example() {

    const [name, setName] = useState(null);
    const [buy, setBuy] = useState(null);
    const [sell, setSell] = useState(null);
    const [differance, setDifferance] = useState(null);
    const [time, setTime] = useState(null);
    const [errors, setErrors] = useState(null);

    function axiosGet() {
        axios.get('/', {
            name: name,
            buy: buy,
            sell: sell,
            differance: differance,
            time: time,
        }).then(response => response.data)
            .then(data => {
                if (data.success) {
                    window.location.href = data.redirect;
                } else {
                    setErrors(data.errors);
                }

            }).catch(error => {
                console.log(error);
            }
            );
    }
    console.log(name)
    return (
        <div>
            <div className="container mt-5">
                <div className="row">
                    <div className='col-md-3'>
                        <div className='card'>
                            <div className='card-header'>
                                <div className='card-body'>
                                    <strong></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Example;

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}

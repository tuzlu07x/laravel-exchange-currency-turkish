import React from 'react';
import ReactDOM from 'react-dom';

function Example() {
    return (
        <div>
            <div className="container mt-5">
                <div className="row">
                    <div className='col-md-3'>
                        <div className='card'>
                            <div className='card-header'>
                                <div className='card-body'>
                                    <strong>Dolar</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className='col-md-3'>
                        <div className='card'>
                            <div className='card-header'>
                                <div className='card-body'>
                                    Deneme
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className='col-md-3'>
                        <div className='card'>
                            <div className='card-header'>
                                <div className='card-body'>
                                    Deneme
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className='col-md-3'>
                        <div className='card'>
                            <div className='card-header'>
                                <div className='card-body'>
                                    Deneme
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

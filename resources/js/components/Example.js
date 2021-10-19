import React from 'react';
import ReactDOM from 'react-dom';
import Button from 'react-bootstrap/Button';

class Timer extends React.Component{

    constructor(props) {
        super(props);
        this.state = { seconds: 0 };
        this.tick = this.tick.bind(this); // bind to the component
    }

    tick() {
        // start timer after button is clicked
        this.interval = setInterval(() => {
            this.setState(prevState => ({
                seconds: prevState.seconds + 1
            }));

        }, 1000);
    }

    componentWillUnmount() {
        clearInterval(this.interval);
    }

    render(){
        return (
            <div className="btn-wrapper d-flex gap-4 mt-3">
                <button type="submit" onClick={this.tick()} className="btn btn-primary w-100">Wyślij ponownie</button>
            </div>
        );
    }
}

if (document.getElementById('verification_button')) {
    ReactDOM.render(<Timer />, document.getElementById('verification_button'));
}

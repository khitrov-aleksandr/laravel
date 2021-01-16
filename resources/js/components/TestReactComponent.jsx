import React from 'react';
import ReactDOM from 'react-dom';

class TestReactComponent extends React.Component {
    render() {
        return <h1>Test React Component</h1>;
    }
}

ReactDOM.render(
    <TestReactComponent />,
    document.getElementById("test-react-component")
);

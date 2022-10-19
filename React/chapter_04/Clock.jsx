// Clock이라는 React 함수 컴포넌트 생성

import React from "react";

// 현재 시간 출력하는 컴포넌트
function Clock(props) {
    return (
        <div>
            <h1>안녕, 리액트!</h1>
            <h2>현재 시간: {new Date().toLocaleTimeString()}</h2>
        </div>
    );
}

export default Clock;
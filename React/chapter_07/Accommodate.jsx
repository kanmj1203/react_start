import React, { useState, useEffect } from "react";
import useCounter from "./useCounter";
/*useCounter Hook 사용하여 카운트 관리
카운트 갯수 = MAX_CAPACITY 상수로 정의
카운트 갯수 최대 초과 시 경고문구 호출, 입장 불가
useEffect훅 동작 방식 알기 위해 2개로 사용
 */
const MAX_CAPACITY = 10;

function Accommodate(props) {
    const [isFull, setIsFull] = useState(false);
    const [count, increaseCount, decreaseCount] = useCounter(0);

    //의존성 배열 X, 컴포넌트가 마운트 직후 호출되며 업데이트 될 떄 마다 호출됨
    useEffect(() => {
        console.log("=======================");
        console.log("useEffect() is called.");
        console.log(`isFull: ${isFull}`);
    });

    // 의존성 배열 O, 컴포넌트가 마운트 직후 호출되며 의존성 변수 count가 변경될 때 마다 호출됨
    useEffect(() => {
        setIsFull(count >= MAX_CAPACITY);
        // 호출될 때 마다 용량 가득찼는지 어떤지 상태를 isFull이라는 state에 저장
        console.log(`Current count value: ${count}`);
    }, [count]);

    return (
        <div style={{padding : 16}}>
            <p>{`총 ${count}명 수용했습니다.`}</p>

            <button onClick={increaseCount} disabled={isFull}>
                입장
            </button>
            <button onClick={decreaseCount}>퇴장</button>

            {isFull && <p style={{color: "red"}}>정원이 가득찼습니다.</p>}
        </div>
    );
}

export default Accommodate;
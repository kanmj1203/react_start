import React, { useState } from "react";
/*useCounter Hook 생성
초기 카운트값 파라미터로 받아서
카운트이름 state생성하여 값 제공
카운트 증가, 감소 편리하게 할 수 있는 함수 제공
*/
function useCounter(initialValue) {
    const [count, setCount] = useState(initialValue);

    const increaseCount = () => setCount((count) => count + 1);
    const decreaseCount = () => setCount((count)=> Math.max(count - 1, 0));

    return [count, increaseCount, decreaseCount];
}

export default useCounter;
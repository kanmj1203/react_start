// import React from "react";

// 클래스 컴포넌트
// class ConfirmButton extends React.Component {
//     constructor(props) {
//         super(props);
        
//         // 기초 상태 설정
//         this.state = {
//             isConfirmed: false, //변수 설정
//         };

//         // // 바인드 방식 사용 하여 이벤트 핸들러 처리
//         // this.handleConfirm = this.handleConfirm.bind(this);
//     }

//     // //이벤트 핸들러
//     // //bind 방식
//     // handleConfirm() {
//     //     // 해당 컴포넌트 상태 변경
//     //     this.setState((prevState) => ({
//     //         isConfirmed: !prevState.isConfirmed,
//     //         // handelConfirm 이벤트 시
//     //         // 현재 컴포넌트의 state에 isConfirmed prop를 반대로 변경
//     //     }));
//     // }

//     // class field Syntax 사용
//     // 이벤트 핸들러 arrow function 사용
//     handleConfirm = () => {
//         this.setState((prevState) => ({
//             // 이벤트 발생한 컴포넌트 상태 받아와서
//             // 해당 컴포넌트 상태 변경하여 isConfirmed에 변경
//             isConfirmed: !prevState.isConfirmed,
//         }));
//     }

//     render() {
//         return (
//           <button
//             onClick={this.handleConfirm}    // 클릭 시 handleConfirm 이벤트 함수 호출
//             disabled={this.state.isConfirmed}   //isConfirmed 보이지 않게
//             >
//                 {/* 상태의 prop에 따라 삼항 연산자 수행 */}
//                 {this.state.isConfirmed ? "확인됨" : "확인하기"}  
//           </button>  
//         );
//     }
// }

import React , {useState} from 'react';

// 함수 컴포넌트
function ConfirmButton(props) {
    const [isConfirmed, setIsConfirmed] = useState(false);
    // useState Hook 사용하여 state 처리

    // 이벤트 리스너
    const handleConfirm = () => {
        // 
        setIsConfirmed((prevIsConfirmed) => !prevIsConfirmed);
    };

    return (
        // isConfirmed 변수가 true되면 비활성화
        <button onClick={handleConfirm} disabled={isConfirmed}> 
        {/* true면 확인됨 */}
            {isConfirmed ? "확인됨" : "확인하기"}
        </button>
    );
}

export default ConfirmButton;
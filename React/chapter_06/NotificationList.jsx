import React from "react";
import Notification from "./Notification";
// Notification컴포넌트 List형태로 보여주기 위한 클래스
// state 선언, 사용


const reservedNotifications = [
    {
        id : 1,
        message: "안녕하세요, 오늘 일정을 알려드립니다.",
    },
    {
        id : 2,
        message: "점심식사 시간입니다.",
    },
    {
        id : 3,
        message: "이제 곧 미팅이 시작됩니다.",
    },
];


var timer;

class NotificationList extends React.Component {
    constructor(props) {
        super(props);

        // notifications라는 빈 배열(리스트) state에 넣음
        // 생성자에서는 앞으로 사용할 데이터를 state에 넣어서 초기화 한다
        
        this.state = {
            notifications: [],
        };
    }

/*  
클래수 함수의 생명주기 함수중 하나인 componentDidMount() 함수 (출생) 사용하여
자바스크립트 setInterval함수 사용하여 1000ms마다 (1초마다) 정해진 작업 수행하게 함
*/
    componentDidMount() {
        const { notifications } = this.state;
        timer = setInterval(() => {
            console.log("------------");
            if (notifications.length < reservedNotifications.length) {
                const index = notifications.length;
                notifications.push(reservedNotifications[index]);
                
/*
미리 만들어둔 reservedNotifications 배열에서 알림 데이터 하나씩 가져와서
state에있는 notifications 배열에 넣고 update함
*/
                this.setState({
                    notifications: notifications,
                });
/*
Class Component에서 State업데이트 하려면 반드시 setState함수 사용해야 함
*/
            } else {
                this.setState({
                    notifications: [],
                });
                clearInterval(timer);
            }
        }, 1000);
    }
    
    /*React.StrickMode 사용 시 처음 실행될 때 unmount시켰다가 다시 remount시킴
    그러므로 componentWillUnmount함수 사용하여 unmount되었을 때 timer가 있다면 종료시킴 */
    componentWillUnmount() {
        if (timer) {
            clearInterval (timer);
        }
    }

    render() {
        return (
            <div>
                {this.state.notifications.map((notification) => {
                    return <Notification
                    key = {notification.id}
                    id = {notification.id}
                    message = {notification.message} />;
                })}
            </div>
        );
    }
}

export default NotificationList;


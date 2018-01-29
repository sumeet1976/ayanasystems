var i = 0;

function timedCount() {
    /*i = i + 1;
    postMessage(i);
    setTimeout("timedCount()",500);*/

    switch(++i){
    	case 1:
    		postMessage('.');
    		break;
		case 2:
    		postMessage('..');
    		break;
    	case 3:
    		postMessage('...');
    		break;
		default:
			i = 0;
			break;
    }
    setTimeout("timedCount()",250);
}

timedCount(); 
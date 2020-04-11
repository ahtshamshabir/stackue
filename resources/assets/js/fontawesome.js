// import library from '@fortawesome/fontawesome-svg-core';
// import faCaretUp from '@fortawesome/free-solid-svg-icons/faCoffee';
// import faCaretDown from '@fortawesome/free-solid-svg-icons/faCoffee';
// import faStar from '@fortawesome/free-solid-svg-icons/faCoffee';
// import faCheck from '@fortawesome/free-solid-svg-icons/faCoffee';
//
// library.add([faCaretUp, faCaretDown, faCheck, faStar]);




import {library, dom} from '@fortawesome/fontawesome-svg-core';
import {faCaretUp} from '@fortawesome/free-solid-svg-icons';
import {faCaretDown} from '@fortawesome/free-solid-svg-icons';
import {faStar} from '@fortawesome/free-solid-svg-icons';
import {faCheck} from '@fortawesome/free-solid-svg-icons';

library.add(faCaretUp, faCaretDown, faCheck, faStar);

dom.watch();

// TypeScript
import {Component, View, bootstrap} from 'angular2/angular2';
@Component({
    selector: 'display'
})
@View({
    template: `
<p>My name: {{ myName }}</p>
`
})
class DisplayComponent {
    myName: string;
    constructor() {
        this.myName = "Alice";
    }
}
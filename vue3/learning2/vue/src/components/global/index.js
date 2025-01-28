import Uinput from "@/components/global/Uinput.vue";
import UFile from "@/components/global/UFile.vue";
import UCheckbox from "@/components/global/UCheckbox.vue";
import URadio from "@/components/global/URadio.vue";

const components = [
    { name: 'Uinput', component: Uinput },
    { name: 'UFile', component: UFile },
    { name: 'UCheckbox', component: UCheckbox },
    { name: 'URadio', component: URadio },
]

export default {
    install(app){
        components.forEach(({ name, component}) => {
            app.component(name, component)
        })
    }
}
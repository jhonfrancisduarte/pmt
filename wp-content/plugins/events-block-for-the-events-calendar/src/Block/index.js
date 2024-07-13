import edit from "./edit";
import EctIcon from "../Components/icons"
const {registerBlockType} = wp.blocks;
const {__} = wp.i18n;

registerBlockType('ebec/event-list',
{
    title:__("Events Block","ebec"),
    category:'common',
    // Block Icon
	icon: EctIcon,
    keywords: [
        __( 'event'),__('calendar'),__('events')
    ],
    example: {
        attributes: {
                'preview' : true,
            },
        },
    edit:edit,
    save(){
        return null;
    }
}
)
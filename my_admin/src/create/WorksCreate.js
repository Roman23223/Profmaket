import React from "react";
import {Create, SimpleForm, TextInput} from "react-admin";
import {RichTextInput} from "ra-input-rich-text";

const WorksCreate = (props) => {
    return (
        <Create {...props}>
            <SimpleForm>
                <TextInput source='header'/>
                <RichTextInput source='description' stripTags />
            </SimpleForm>
        </Create>
    )
}

export default WorksCreate
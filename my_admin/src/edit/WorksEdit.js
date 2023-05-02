import React from "react";
import {Datagrid, Edit, ReferenceArrayInput, SimpleForm, TextField, TextInput} from 'react-admin';
import {RichTextInput} from "ra-input-rich-text";

const WorksEdit = (props) => {
    return (
        <Edit {...props}>
            <SimpleForm>
                <TextInput source='header'/>
                <RichTextInput source='description' stripTags />
                <ReferenceArrayInput source='images' reference='images'>
                </ReferenceArrayInput>
            </SimpleForm>
        </Edit>
    )
}

export default WorksEdit
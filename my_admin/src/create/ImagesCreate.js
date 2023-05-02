import React from "react";
import {Create, SimpleForm, ImageInput, ImageField, ReferenceInput} from "react-admin";

const ImagesCreate = (props) => {
    return (
        <Create {...props}>
            <SimpleForm>
                <ImageInput source='file'>
                    <ImageField source='src'/>
                </ImageInput>
                <ReferenceInput source='works' reference='works'>
                </ReferenceInput>
            </SimpleForm>
        </Create>
    )
}

export default ImagesCreate
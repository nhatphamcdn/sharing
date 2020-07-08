import Quill from 'quill';
import Delta from 'quill-delta';

export default (context, inject) => {
    const editorjs = (ele, options) => {
        return new Quill(ele, {
            ...options
        });
    }

    const editorDelta = () => {
        return new Delta();
    }

    inject('editorjs', editorjs);
    inject('editorDelta', editorDelta);
}
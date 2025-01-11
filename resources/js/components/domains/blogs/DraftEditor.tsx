import React, { useState } from 'react';
import { Editor, EditorState } from 'draft-js';
import 'draft-js/dist/Draft.css';

const DraftEditor: React.FC = () => {
  const [editorState, setEditorState] = useState(EditorState.createEmpty());

  const handleChange = (state: EditorState) => {
    setEditorState(state);
  };

  return (
    <div style={{ border: '1px solid #ccc', padding: '10px', minHeight: '200px' }}>
      <Editor
        editorState={editorState}
        onChange={handleChange}
        placeholder="ここにテキストを入力してください..."
      />
    </div>
  );
};

export default DraftEditor;

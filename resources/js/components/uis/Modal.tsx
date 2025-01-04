import React from 'react';

// 画像データの型を定義
interface UiModalProps {
  content: React.ReactNode;
  onClose: () => void;
}

const UiModal: React.FC<UiModalProps> = ({ 
  content,
  onClose,
}) => {
  // 閉じるボタンの定義
  const closeButton = () => {
    return (
      <button onClick={onClose} className="closeButton">
        Close
      </button>
    );
  };

  return (
    <div className="modal">
      {closeButton()}
      <div className="modalPanel">
        {content}
      </div>
    </div>
  );
};

export default UiModal;

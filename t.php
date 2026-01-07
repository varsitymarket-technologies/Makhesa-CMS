<section class="block-request-engine-container">
  
  <div class="block-engine-container-toolbar">
    <button class="tool-btn edit-btn" title="Edit Settings">
      <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
      </svg>
      <span>Edit Block</span>
    </button>
  </div>

  <div class="block-engine-container-content">
    <h2>New Section Block</h2>
    <p>Click the floating button above to modify this section.</p>
  </div>

</section>

<style>
  /* 1. The Block Wrapper with Solid Border */
  .block-request-engine-container {
    position: relative; /* Essential for the floating button positioning */
    margin: 40px auto;
    padding: 60px 20px;
    max-width: 800px;
    background: #ffffff;
    
    /* Solid Border Line */
    border: 2px solid #6366f1; 
    border-radius: 8px;
    font-family: sans-serif;
  }

  /* 2. The Fixed/Floating Tool Button Container */
  .block-engine-container-toolbar {
    position: absolute;
    top: -18px; /* Offset to sit on the border line */
    right: 20px;
    z-index: 10;
  }

  /* 3. The Tool Button Style */
  .tool-btn {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 8px 16px;
    background: #6366f1;
    color: white;
    border: none;
    border-radius: 20px;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
    box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);
    transition: all 0.2s ease;
  }

  .tool-btn:hover {
    background: #4f46e5;
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(99, 102, 241, 0.4);
  }

  /* Content Styling */
  .block-engine-container-content {
    text-align: center;
    color: #374151;
  }
  
  .block-engine-container-content h2 { margin-top: 0; }
</style>